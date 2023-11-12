async function process() {
    const r = await fetch("/data.json");
    const data = await r.json();

    const selectOptions = (key, selectId, data) => {
        const mappedData = data.map(item => item[key]);
        const uniqueValues = [...new Set(mappedData)];
        const select = document.querySelector(selectId);

        uniqueValues.forEach(item => {
            const option = document.createElement("option");
            option.value = item;
            option.text = item;
            select.add(option);
        });
    };

    selectOptions('Насколько курс был полезен?', "#selectPoleznost", data);
    selectOptions('Насколько материал курса был понятен?', "#selectUdovletvarennost", data);
    selectOptions('Насколько доволен форматом обучения?', "#selectFormTraining", data);
}

async function fillList() {
    let r = await fetch("/data.json");
    let data = await r.json();
    // console.log(data);

    let container = document.querySelector("#elements-container > tbody");

    let selectPoleznost = document.querySelector("#selectPoleznost");
    let selectUdovletvarennost = document.querySelector("#selectUdovletvarennost");
    let selectFormTraining = document.querySelector("#selectFormTraining");

    let filteredData = data.filter(item => {

        const poleznostMatch = selectPoleznost.value == 'не важно' || item['Насколько курс был полезен?'] == selectPoleznost.value
        const udovletvarennostMatch = selectUdovletvarennost.value == 'не важно' || item['Насколько материал курса был понятен?'] == selectUdovletvarennost.value
        const formTrainingMatch = selectFormTraining.value == 'не важно' || item['Насколько доволен форматом обучения?'] == selectFormTraining.value

        return poleznostMatch && udovletvarennostMatch && formTrainingMatch
    })
    // ----------------------------Задание 3.4
    let poleznost = filteredData.map(item => item['Насколько курс был полезен?']);
    let poleznostCounters = {} 
    poleznost.forEach(item => { 
        poleznostCounters[item] = (poleznostCounters[item] | 0) + 1
    })
    let poleznostStatsNode = document.querySelector("#poleznostStats .stats")
    poleznostStatsNode.innerText = JSON.stringify(poleznostCounters);

    let Udovletvarennost = filteredData.map(item => item['Насколько материал курса был понятен?']);
    let UdovletvarennostCounters = {} 
    Udovletvarennost.forEach(item => { 
        UdovletvarennostCounters[item] = (UdovletvarennostCounters[item] | 0) + 1
    })
    let UdovletvarennostStatsNode = document.querySelector("#UdovletvarennostStats .stats")
    UdovletvarennostStatsNode.innerText = JSON.stringify(UdovletvarennostCounters);
    
    let FormTraining = filteredData.map(item => item['Насколько доволен форматом обучения?']);
    let FormTrainingCounters = {} 
    FormTraining.forEach(item => { 
        FormTrainingCounters[item] = (FormTrainingCounters[item] | 0) + 1
    })
    console.log(FormTrainingCounters)
    let FormTrainingStatsNode = document.querySelector("#FormTrainingStats .stats")
    FormTrainingStatsNode.innerText = JSON.stringify(FormTrainingCounters);
    // ----------------------------
    container.replaceChildren();//удаление всех строчек из таблы
    filteredData.forEach(item => {
        container.insertAdjacentHTML("beforeend", `
            <tr>
                <td>${item['ID']}</td>
                <td>${item['Насколько курс был полезен?']}</td>
                <td>${item['Насколько материал курса был понятен?']}</td>
                <td>${item['Насколько доволен форматом обучения?']}</td>
            </tr>
            `);
    })

}
async function onSelectChanged(selectId) {
    // Убрал эти 3 метода
    // onchange="onSelectPoleznostChanged()" 
    // onchange="onSelectUdovletvarenChanged()"
    // onchange="onSelectFormTrainingChanged()"
    let selectElement = document.querySelector(selectId);
    console.log(selectElement.value);
    fillList();
}

process();
fillList();

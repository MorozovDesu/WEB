


let poleznostChart = null;
let UdovletvarennostChart = null;
let TrainingChart = null;

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
    // ----------------------------Задание 3.4 + 3.5
    
    function generateStatsAndChart(dataKey, statsNodeSelector, chart,  colors) {
        // Генерируем статистику
        const data = filteredData.map(item => item[dataKey]);
        const counters = {};
    
        data.forEach(item => {
            counters[item] = (counters[item] | 0) + 1;
        });
    
        const statsNode = document.querySelector(statsNodeSelector);
        statsNode.innerText = JSON.stringify(counters);
    
        // Генерируем график
        const labels = Object.keys(counters);
        const values = Object.values(counters);
    
        
        chart.data.labels = labels;
        chart.data.datasets = [{
            label: 'Количество голосов',
            data: values,
            backgroundColor: colors,
        },
    ];
    
        chart.update();
    }
    
    // Вызываю функцию для каждого набора данных и соответствующего элемента управления графиком и статистикой
    const poleznostColors = ['lightblue'];
    generateStatsAndChart('Насколько курс был полезен?', '#poleznostStats .stats', poleznostChart, poleznostColors);
    const UdovletvarennostColors = ['pink'];
    generateStatsAndChart('Насколько материал курса был понятен?', '#UdovletvarennostStats .stats', UdovletvarennostChart, UdovletvarennostColors);
    const FormTrainingColors = ['orange'];
    generateStatsAndChart('Насколько доволен форматом обучения?', '#FormTrainingStats .stats', FormTrainingChart, FormTrainingColors);

    // let poleznost = filteredData.map(item => item['Насколько курс был полезен?']);
    // let poleznostCounters = {}
    // poleznost.forEach(item => {
    //     poleznostCounters[item] = (poleznostCounters[item] | 0) + 1
    // })
    // let poleznostStatsNode = document.querySelector("#poleznostStats .stats")
    // poleznostStatsNode.innerText = JSON.stringify(poleznostCounters);
    // // console.log(Object.keys(poleznostCounters))
    // // console.log(Object.values(poleznostCounters))
    // let labelspoleznost = Object.keys(poleznostCounters)
    // let valuespoleznost = Object.values(poleznostCounters)
    // poleznostChart.data.labels = labelspoleznost // передали ось X
    // poleznostChart.data.datasets = [{
    //     label: 'количество голосов',
    //     data: valuespoleznost, // передали ось Y
    // }]
    // poleznostChart.update() // перерисовали график

    // let Udovletvarennost = filteredData.map(item => item['Насколько материал курса был понятен?']);
    // let UdovletvarennostCounters = {}
    // Udovletvarennost.forEach(item => {
    //     UdovletvarennostCounters[item] = (UdovletvarennostCounters[item] | 0) + 1
    // })
    // let UdovletvarennostStatsNode = document.querySelector("#UdovletvarennostStats .stats")
    // UdovletvarennostStatsNode.innerText = JSON.stringify(UdovletvarennostCounters);
    // // console.log(Object.keys(poleznostCounters))
    // // console.log(Object.values(poleznostCounters))
    // let labelsUdovletvarennost = Object.keys(UdovletvarennostCounters)
    // let valuesUdovletvarennost = Object.values(UdovletvarennostCounters)
    // UdovletvarennostChart.data.labels = labelsUdovletvarennost // передали ось X
    // UdovletvarennostChart.data.datasets = [{
    //     label: 'количество голосов',
    //     data: valuesUdovletvarennost, // передали ось Y
    // }]
    // UdovletvarennostChart.update() // перерисовали график

    // let FormTraining = filteredData.map(item => item['Насколько доволен форматом обучения?']);
    // let FormTrainingCounters = {}
    // FormTraining.forEach(item => {
    //     FormTrainingCounters[item] = (FormTrainingCounters[item] | 0) + 1
    // })
    // console.log(FormTrainingCounters)
    // let FormTrainingStatsNode = document.querySelector("#FormTrainingStats .stats")
    // FormTrainingStatsNode.innerText = JSON.stringify(FormTrainingCounters);
    // // console.log(Object.keys(poleznostCounters))
    // // console.log(Object.values(poleznostCounters))
    // let labelsFormTraining = Object.keys(FormTrainingCounters)
    // let valuesFormTraining = Object.values(FormTrainingCounters)
    // FormTrainingChart.data.labels = labelsFormTraining // передали ось X
    // FormTrainingChart.data.datasets = [{
    //     label: 'количество голосов',
    //     data: valuesFormTraining, // передали ось Y
    // }]
    // FormTrainingChart.update() // перерисовали график
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
    let selectElement = document.querySelector(selectId);
    console.log(selectElement.value);
    fillList();
}
async function createChartpoleznost() {
    const chartContainer = document.querySelector('#chart');

    poleznostChart = new Chart(chartContainer, {
      type: 'bar',
      options: {
        maintainAspectRatio: false
      },
    });
}
async function createChartUdovletvarennost() {
    const chartContainer = document.querySelector('#chart2');

    UdovletvarennostChart = new Chart(chartContainer, {
      type: 'bar',
      options: {
        maintainAspectRatio: false
      },
    });
}
async function createChartFormTraining() {
    const chartContainer = document.querySelector('#chart3');

    FormTrainingChart = new Chart(chartContainer, {
      type: 'bar',
      options: {
        maintainAspectRatio: false
      },
    });
}
process();
fillList();
createChartpoleznost();
createChartUdovletvarennost();
createChartFormTraining();




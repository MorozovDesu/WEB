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

process();






// async function process() {
//     let r = await fetch("/data.json");
//     let data = await r.json();
//     console.log(data) // выведем исходный список


//     let mappedData = data.map(item => {
//         return item['Насколько курс был полезен?']; // добавил конкретный ключ
//     })
//     console.log(mappedData)

//     let uniqueValues = [...new Set(mappedData)] // это такой хитрый способ перегнать множество в список
//     console.log(uniqueValues)

//     let selectPoleznost = document.querySelector("#selectPoleznost");
//     console.log(selectPoleznost)

//     uniqueValues.forEach(item => {
//         let optionPoleznost = document.createElement("option");
//         optionPoleznost.value = item;  // устанавливаем значение элемента
//         optionPoleznost.text = item; // устанавливаем текст элемента, он совпадает со значением
//         selectPoleznost.add(optionPoleznost) // добавляем элемент к выпадающему списку

//     })
//     // -------------------------------------------------------------------------------

//     let mappedData2 = data.map(item => {
//         return item['Насколько материал курса был понятен?']; // добавил конкретный ключ
//     })
//     console.log(mappedData2)

//     let uniqueValues2 = [...new Set(mappedData2)] // это такой хитрый способ перегнать множество в список
//     console.log(uniqueValues2)

//     let selectUdovletvarennost = document.querySelector("#selectUdovletvarennost");
//     console.log(selectUdovletvarennost)



//     uniqueValues2.forEach(item => {

//         let optionUdovletvarennost = document.createElement("option");
//         optionUdovletvarennost.value = item;  // устанавливаем значение элемента
//         optionUdovletvarennost.text = item; // устанавливаем текст элемента, он совпадает со значением
//         selectUdovletvarennost.add(optionUdovletvarennost) // добавляем элемент к выпадающему списку

//     })
//     // -------------------------------------------------------------------------------

//     let mappedData3 = data.map(item => {
//         return item['Насколько доволен форматом обучения?']; // добавил конкретный ключ
//     })
//     console.log(mappedData3)

//     let uniqueValues3 = [...new Set(mappedData3)] // это такой хитрый способ перегнать множество в список
//     console.log(uniqueValues3)

//     let selectFormTraining = document.querySelector("#selectFormTraining");
//     console.log(selectFormTraining)

//     uniqueValues3.forEach(item => {

//         let optionFormTraining = document.createElement("option");
//         optionFormTraining.value = item;  // устанавливаем значение элемента
//         optionFormTraining.text = item; // устанавливаем текст элемента, он совпадает со значением
//         selectFormTraining.add(optionFormTraining) // добавляем элемент к выпадающему списку

//     })
// }

// process()
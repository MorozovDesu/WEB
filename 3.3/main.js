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
        console.log(data);
    
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




// async function fillList() {
//     let r = await fetch("/data.json");
//     let data = await r.json();
//     console.log(data);

//     let container = document.querySelector("#elements-container > tbody");

//     let selectPoleznost = document.querySelector("#selectPoleznost");

//     let filteredDataPoleznost = data.filter(item => {
//         // чтобы не получалось сильно длинных строчек, я перепишу анонимную функцию через return
//         return selectPoleznost.value == 'не важно' || item['Насколько курс был полезен?'] == selectPoleznost.value
//     })
   

//     container.replaceChildren();//удаление всех строчек из таблы
//     filteredDataPoleznost.forEach(item => {
//         container.insertAdjacentHTML("beforeend", `
//         <tr>
//             <td>${item['ID']}</td>
//             <td>${item['Насколько курс был полезен?']}</td>
//             <td>${item['Насколько материал курса был понятен?']}</td>
//             <td>${item['Насколько доволен форматом обучения?']}</td>
//         </tr>
//         `);
//     })

// }
// async function fillList2() {
//     let r = await fetch("/data.json");
//     let data = await r.json();
//     console.log(data);

//     let container = document.querySelector("#elements-container > tbody");

//     let selectUdovletvarennost = document.querySelector("#selectUdovletvarennost");
    
//     let filteredDataUdovletvarennost = data.filter(item => {
//         // чтобы не получалось сильно длинных строчек, я перепишу анонимную функцию через return
//         return selectUdovletvarennost.value == 'не важно' || item['Насколько материал курса был понятен?'] == selectUdovletvarennost.value
//     })
//     container.replaceChildren();//удаление всех строчек из таблы
//     filteredDataUdovletvarennost.forEach(item => {
//         container.insertAdjacentHTML("beforeend", `
//         <tr>
//             <td>${item['ID']}</td>
//             <td>${item['Насколько курс был полезен?']}</td>
//             <td>${item['Насколько материал курса был понятен?']}</td>
//             <td>${item['Насколько доволен форматом обучения?']}</td>
//         </tr>
//         `);
//     })
// }
// async function fillList3() {
//     let r = await fetch("/data.json");
//     let data = await r.json();
//     console.log(data);

//     let container = document.querySelector("#elements-container > tbody");

//     let selectFormTraining = document.querySelector("#selectFormTraining");

//     let filteredDataFormTraining = data.filter(item => {
//         // чтобы не получалось сильно длинных строчек, я перепишу анонимную функцию через return
//         return selectFormTraining.value == 'не важно' || item['Насколько доволен форматом обучения?'] == selectFormTraining.value
//     })

//     container.replaceChildren();//удаление всех строчек из таблы
    
//     filteredDataFormTraining.forEach(item => {
//         container.insertAdjacentHTML("beforeend", `
//         <tr>
//             <td>${item['ID']}</td>
//             <td>${item['Насколько курс был полезен?']}</td>
//             <td>${item['Насколько материал курса был понятен?']}</td>
//             <td>${item['Насколько доволен форматом обучения?']}</td>
//         </tr>
//         `);
//     })
// }







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
// }-----------------------------------------------------------------------------------------------------------------------------------
// async function fillList() {
//     let r = await fetch("/data.json");
//     let data = await r.json();
//     console.log(data);

//     let container = document.querySelector("#elements-container > tbody");

//      let selectPoleznost = document.querySelector("#selectPoleznost");
//     let selectUdovletvarennost = document.querySelector("#selectUdovletvarennost");
//     let selectFormTraining = document.querySelector("#selectFormTraining");


//     let filteredDataPoleznost = data.filter(item => {
//         // чтобы не получалось сильно длинных строчек, я перепишу анонимную функцию через return
//         return selectPoleznost.value == 'не важно' || item['Насколько курс был полезен?'] == selectPoleznost.value
//     })
//      let filteredDataUdovletvarennost = data.filter(item => {
//          // чтобы не получалось сильно длинных строчек, я перепишу анонимную функцию через return
//          return selectUdovletvarennost.value == 'не важно' || item['Насколько материал курса был понятен?'] == selectUdovletvarennost.value
//      })
//      let filteredDataFormTraining = data.filter(item => {
//          // чтобы не получалось сильно длинных строчек, я перепишу анонимную функцию через return
//          return selectFormTraining.value == 'не важно' || item['Насколько доволен форматом обучения?'] == selectFormTraining.value
//      })

//     container.replaceChildren();//удаление всех строчек из таблы
//     filteredDataPoleznost.forEach(item => {
//         container.insertAdjacentHTML("beforeend", `
//         <tr>
//             <td>${item['ID']}</td>
//             <td>${item['Насколько курс был полезен?']}</td>
//             <td>${item['Насколько материал курса был понятен?']}</td>
//             <td>${item['Насколько доволен форматом обучения?']}</td>
//         </tr>
//         `);
//     })
//      filteredDataUdovletvarennost.forEach(item => {
//          container.insertAdjacentHTML("beforeend", `
//          <tr>
//              <td>${item['ID']}</td>
//              <td>${item['Насколько курс был полезен?']}</td>
//              <td>${item['Насколько материал курса был понятен?']}</td>
//              <td>${item['Насколько доволен форматом обучения?']}</td>
//          </tr>
//          `);
//      })
//      filteredDataFormTraining.forEach(item => {
//          container.insertAdjacentHTML("beforeend", `
//          <tr>
//              <td>${item['ID']}</td>
//              <td>${item['Насколько курс был полезен?']}</td>
//              <td>${item['Насколько материал курса был понятен?']}</td>
//              <td>${item['Насколько доволен форматом обучения?']}</td>
//          </tr>
//          `);
//      })
// }


// async function onSelectPoleznostChanged() {
//     let selectPoleznost = document.querySelector("#selectPoleznost")
//     console.log(selectPoleznost.value)
//     fillList()
// }
// async function onSelectUdovletvarenChanged() {
//     let selectUdovletvarennost = document.querySelector("#selectUdovletvarennost")
//     console.log(selectUdovletvarennost.value)
//     fillList()
// }
// async function onSelectFormTrainingChanged() {
//     let selectFormTraining = document.querySelector("#selectFormTraining")
//     console.log(selectFormTraining.value)
//     fillList()
// }
//  process()
// fillList()
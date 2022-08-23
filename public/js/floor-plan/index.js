function appendTable(id, count) {
    let tableDiv = $(`#${id}`)
    tableDiv.empty()
    for (let c = 0; c < count; c++) {
        tableDiv.append(`<div><label class="label">Столик ${c+1}</label>
        <div class="table_description">
            <input type="text" hidden name="table[${c}][id]" value="">
            <input type="text" hidden name="table[${c}][number]" value="${c+1}">
            <input type="text" placeholder="Описание расположения" class="input_text" name="table[${c}][location]" required>
            <input type="number" placeholder="Кол.во стулов" class="input_number" name="table[${c}][count]" required min="1">
        </div></div>`)
    }
}


function addTable() {
    let tableCount = $('#table_count').val()
    if (tableCount > 0) {
        appendTable('tables_div', tableCount)
    }
}

function destroyTable(el) {
    console.log(el.parentNode.parentNode.remove())
}

function addOneTable() {
    let tableDiv = $('#tables_div');
    let cls = tableDiv.find('.table_description').length

    tableDiv.append(`<div><label class="label">Столик ${cls+1}</label>
        <div class="table_description">
            <input type="text" hidden name="table[${cls}][id]" value="">
            <input type="text" hidden name="table[${cls}][number]" value="${cls+1}">
            <input type="text" placeholder="Описание расположения" class="input_text" name="table[${cls}][location]" required>
            <input type="number" placeholder="Кол.во стулов" class="input_number" name="table[${cls}][count]" required min="1">
        </div></div>`)

    $('#table_count').val((+$('#table_count').val() + 1))

}
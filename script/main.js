let count = 2;
function addTable() {
    count = 2;
    const check = document.getElementById("my_table");
    if (check !== null) {
        alert("Table already exists");
        return;
    }
    const table = document.createElement("table");
    table.setAttribute("id", "my_table");

    const tr1 = document.createElement("tr");
    const th1 = document.createElement("th");
    th1.innerHTML = "ID";
    const th2 = document.createElement("th");
    th2.innerHTML = "Task";
    const th3 = document.createElement("th");
    th3.innerHTML = "DeadLine";
    tr1.appendChild(th1);
    tr1.appendChild(th2);
    tr1.appendChild(th3);
    table.appendChild(tr1);


    for (let i = 0; i < count; i++) {
        const tr11 = document.createElement("tr");
        const th11 = document.createElement("th");
        th11.innerHTML = "" + (i + 1);
        const th12 = document.createElement("th");
        th12.innerHTML = "some task " + (i + 1);
        const th13 = document.createElement("th");
        th13.innerHTML = "some deadline " + (i + 1);
        tr11.appendChild(th11);
        tr11.appendChild(th12);
        tr11.appendChild(th13);
        table.appendChild(tr11);

    }

    document.getElementById("root").appendChild(table);
    document.getElementById("btn1").disabled = false;
    document.getElementById("btn2").disabled = false;
    showAddTableSuccessToast();
}

function addRow() {
    count++;
    const table = document.getElementById("my_table");
    const task = document.getElementById('task');
    const deadline = document.getElementById("deadline");
    const row = table.insertRow(-1);
    const cell1 = row.insertCell(0);
    const cell2 = row.insertCell(1);
    const cell3 = row.insertCell(2);
    cell1.innerHTML = "" + count;
    cell2.innerHTML = task.value;
    cell3.innerHTML = deadline.value;
    task.value = "";
    deadline.value = "";
    showAddSuccessToast();
}

function deleteRow() {
    const table = document.getElementById("my_table");
    const id = document.getElementById("id").value;
    if (isNaN(id) || id === "") {
        alert("Please write the number");
        return;
    }
    let length = table.rows.length;
    if (id >= length) {
        document.getElementById("id").value = "";
        showErrorToast();
        return;
    }
    table.deleteRow(id);
    document.getElementById("id").value = "";
    length = table.rows.length;
    if (length === 1) {
        document.getElementById("btn1").disabled = true;
        document.getElementById("btn2").disabled = true;
        table.setAttribute("id", "");
        table.deleteRow(0);
    }
    for (let i = id; i < length; i++) {
        table.rows[i].cells[0].innerHTML = "" + i;
    }
    document.getElementById("id").value = "1";
    showDeleteSuccessToast();
    count--;
}

function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };


        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s forwards`;

        toast.innerHTML = `
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                  `;

        main.appendChild(toast);
    }
}



function showAddTableSuccessToast() {
    toast({
        title: "Successfully",
        message: "Added table successfully.",
        type: "success",
        duration: 10
    });
}

function showDeleteSuccessToast() {
    toast({
        title: "Successfully",
        message: "Deleted row successfully",
        type: "success",
        duration: 10
    });
}

function showAddSuccessToast() {
    toast({
        title: "Successfully!",
        message: "Added row successfully",
        type: "success",
        duration: 10
    });
}

function showErrorToast() {
    toast({
        title: "Failed!",
        message: "Row id isn't exist.",
        type: "error",
        duration: 10
    });
}

// const inputFileBtn = document.getElementById('addInputFile');
// const fileInputArea = document.getElementById('fileInputArea');

// inputFileBtn.addEventListener('click',()=>{
//     var input = document.createElement("INPUT");
//     var div = document.createElement("div");
//     input.setAttribute("type", "file");
//     input.setAttribute("name", "files[]");
//     div.setAttribute("class", "mb-2");
//     fileInputArea.appendChild(div);
//     div.appendChild(input);
// });



// const inputFileBtn = document.getElementById('addInputFile');
// const fileInputArea = document.getElementById('fileInputArea');

// inputFileBtn.addEventListener('click', () => {
//     var input = document.createElement("INPUT");
//     var div = document.createElement("div");
//     var cancelBtn = document.createElement("button");

//     input.setAttribute("type", "file");
//     input.setAttribute("name", "files[]");
//     div.setAttribute("class", "mb-2");

//     cancelBtn.textContent = "Cancel";
//     cancelBtn.addEventListener("click", function() {
//         div.remove(); 
//     });

//     fileInputArea.appendChild(div);
//     div.appendChild(input);
//     div.appendChild(cancelBtn);
// });


const inputFileBtn = document.getElementById('addInputFile');
const fileInputArea = document.getElementById('fileInputArea');

inputFileBtn.addEventListener('click', () => {
    var input = document.createElement("INPUT");
    var div = document.createElement("div");
    var cancelBtn = document.createElement("i");
    var privacy = document.createElement("button");

    input.setAttribute("type", "file");
    input.setAttribute("name", "files[]");
    // div.setAttribute("class", "mb-2 d-flex gap-2");
    div.classList.add("class", "mb-2", "d-flex", "align-items-center", "gap-2");

    // cancelBtn.textContent = "Cancel";
    cancelBtn.classList.add("ri-delete-bin-line", "fs-2");
    privacy.textContent = "Hide";
    cancelBtn.addEventListener("click", function () {
        div.remove();
    });

    privacy.addEventListener("click", function () {
        event.preventDefault();
        if (input.getAttribute('name') == "files[]") {
            input.setAttribute("name", "hiddenFiles[]");
            privacy.textContent = "Show";
        }
        else {
            privacy.textContent = "Hide";
            input.setAttribute("name", "files[]");
        }
    });

    fileInputArea.appendChild(div);
    div.appendChild(input);
    div.appendChild(cancelBtn);
    div.appendChild(privacy);
});

const hiddenFileStatus = document.querySelectorAll('.hiddenFileStatus');

hiddenFileStatus.forEach((item)=>{
    item.addEventListener('click', ()=>{
        const hiddenInput = document.createElement('input');
        if (item.getAttribute('status') == 'false') {
            item.setAttribute('status', 'true');
            item.firstChild.classList.remove('ri-eye-off-line');
            item.firstChild.classList.add('ri-eye-line');
        }
        else {
            item.setAttribute('status', 'false');
            item.firstChild.classList.add('ri-eye-off-line');
            item.firstChild.classList.remove('ri-eye-line');
            hiddenInput.remove();
        }
        item.appendChild(hiddenInput);
    });
})

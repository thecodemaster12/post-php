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


const inputFileBtn = document.getElementById('addInputFile');
const fileInputArea = document.getElementById('fileInputArea');

inputFileBtn.addEventListener('click', () => {
    var input = document.createElement("INPUT");
    var div = document.createElement("div");
    var cancelBtn = document.createElement("button");
    var privacy = document.createElement("button");

    input.setAttribute("type", "file");
    input.setAttribute("name", "files[]");
    div.setAttribute("class", "mb-2");
    
    cancelBtn.textContent = "Cancel";
    privacy.textContent = "privacy";
    cancelBtn.addEventListener("click", function() {
        div.remove(); 
        });
        
    privacy.addEventListener("click", function() {
        event.preventDefault();
        input.setAttribute("name", "privacy");
    });

    fileInputArea.appendChild(div);
    div.appendChild(input);
    div.appendChild(cancelBtn);
    div.appendChild(privacy);
});

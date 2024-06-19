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



// Live Search 

$(document).ready(function () {
    $.ajax({
        url: "showdata.php",
        method: 'POST',
        // data:{show:show},

        success: function (data) {
            $("#showData").html(data);
        }
    });
    $("#searchItem").keyup(function () {
        var name = $(this).val();
        // alert(name);

        if (name != '') {
            $.ajax({
                url: "livesearch.php",
                method: 'POST',
                data: { name: name },

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
        else {
            $.ajax({
                url: "showdata.php",
                method: 'POST',
                // data:{show:show},

                success: function (data) {
                    $("#showData").html(data);
                }
            });
        }
    });
});




const inputFileBtn = document.getElementById('addInputFile');
const fileInputArea = document.getElementById('fileInputArea');

inputFileBtn.addEventListener('click', () => {
    var input = document.createElement("INPUT");
    var div = document.createElement("div");
    var cancelBtn = document.createElement("button");
    var privacy = document.createElement("button");

    input.setAttribute("type", "file");
    input.setAttribute("name", "files[]");
    div.setAttribute("class", "mb-2 d-flex gap-2");

    cancelBtn.textContent = "Cancel";
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
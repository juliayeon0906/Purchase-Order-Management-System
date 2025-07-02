document.getElementById('clientInputButton').addEventListener("click", function(event){
    event.preventDefault();

    const poForm = document.getElementById('poForm');
    poForm.style.visibility = "visible";
});

document.getElementById('poFormButton').addEventListener("click", function(event){
    event.preventDefault();

    const lineForm = document.getElementById('lineForm');
    lineForm.style.visibility = "visible";
});
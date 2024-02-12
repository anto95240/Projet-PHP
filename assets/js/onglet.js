document.addEventListener('DOMContentLoaded', function () {
    const addButton = document.getElementById('btnAdd');
    const modifyButton = document.getElementById('btnMod');
    const deleteButton = document.getElementById('btnSup');
    const createSection = document.getElementById('createSection');
    const modifySection = document.getElementById('modifySection');
    const deleteSection = document.getElementById('deleteSection');

    addButton.addEventListener('click', function () {
        createSection.style.display = 'flex';
        modifySection.style.display = 'none';
        deleteSection.style.display = 'none';
    });

    modifyButton.addEventListener('click', function () {
        createSection.style.display = 'none';
        modifySection.style.display = 'flex';
        deleteSection.style.display = 'none';
    });

    deleteButton.addEventListener('click', function () {
        createSection.style.display = 'none';
        modifySection.style.display = 'none';
        deleteSection.style.display = 'flex';
    });
});
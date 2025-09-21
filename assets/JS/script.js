document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('sortingForm');
    const buttons = form.querySelectorAll('button');
    const sortingInput = document.getElementById('sorting');
    const orderInput = document.getElementById('order');


    function handleButtonClick(button) {
        const sortingValue = button.name.split('_')[1];
        sortingInput.value = sortingValue;


        if (orderInput.value === 'ASC') {
            orderInput.value = 'DESC';
        } else {
            orderInput.value = 'ASC';
        }

        form.submit();
    }


    buttons.forEach(button => {
        button.addEventListener('click', function () {
            handleButtonClick(button);
        });
    });
});
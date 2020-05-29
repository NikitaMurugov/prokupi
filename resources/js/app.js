require('./bootstrap');

// console.log('scscscscsc');
window.onload = function(){
    function updateUser(ev) {
        let data = {};
        console.log("АПДЕЙТ!"); // переберём все элементы input, textarea и select формы с id="myForm "

        $('#update-user').find('input, textearea, select').each(function () {
            // добавим новое свойство к объекту $data
            // имя свойства – значение атрибута name элемента
            // значение свойства – значение свойство value элемента
            data[this.name] = $(this).val();
        });
        $.ajax({
            url: '/update/user',
            type: 'post',
            data: data,
            success: function success(result) {
                console.info('Вы обновили данные вашей учетной записи!');
            }
        });
    };

    // console.log(document.querySelector('.fa-search'));
    document.querySelector('.fa-search').addEventListener('click', function () {
        // console.log('sdasda');
        document.querySelector('.search-input-button').click();
    });
};

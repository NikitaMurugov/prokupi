
window.onload = function(){
    let email = document.querySelector('.email'),
        auto = document.querySelector('.autosuffix'),

        popularEmails = ['yandex.ru', 'mail.ru', 'inbox.ru', 'list.ru', 'bk.ru', 'bd.ru', 'bc.ru'],

        itemSelected = 0,

        itemList = [];

    window.addEventListener('keyup', function(){

        if(window.event.keyCode === 40) { // Down
            if(itemSelected === (itemList.length - 1)) {
                itemSelected = itemList.length - 1;
            }
            else {
                itemSelected += 1;
            }
        }

        if(window.event.keyCode === 38) { // Up
            if(itemSelected === 0) {
                return;
            }
            else {
                itemSelected -= 1;
            }
        }

        if(window.event.keyCode === 13) { // Enter
            email.value = itemList[itemSelected].textContent;
            auto.innerHTML = '';
        }

        for(let i = 0; i < itemList.length; i++) { // For loop through all items and add selected class if needed
            if(itemList[i].classList.contains('selected')) {
                itemList[i].classList.remove('selected');
            }
            if(itemSelected === i) {
                itemList[i].classList.add('selected');
            }
        }

        console.log(itemSelected, itemList);
    });


    email.addEventListener('keyup', function() {
        auto.innerHTML = '';

        if(email.value.match('@')) { // If the input has a @ in it
            let afterAt = email.value.substring(email.value.indexOf('@') + 1, email.value.length);
            let popularEmailsSub = [];

            for(let l = 0; l < popularEmails.length; l++) {
                popularEmailsSub.push(popularEmails[l].substring(0, afterAt.length))
            }

            if(afterAt === '') {
                for(let i = 0; i < popularEmails.length; i++) {
                    auto.innerHTML += '<li>' + email.value + popularEmails[i] + '</li>';
                }
                itemList = document.querySelectorAll('.autosuffix li');
                itemList[0].classList.add('selected');
            }

            else if(!(afterAt === '')) {
                let matchedEmails = [];

                for(let k = 0; k < popularEmails.length; k++) {
                    if(popularEmailsSub[k].match(afterAt)) {
                        matchedEmails.push(popularEmails[k]);
                    }
                }

                for(let i = 0; i < matchedEmails.length; i++) {
                    auto.innerHTML += '<li>' + email.value.substring(0, email.value.indexOf('@')) + '@' + matchedEmails[i] + '</li>';
                }
            }

            let itemsList = document.querySelectorAll('.autosuffix li');

            for(let j = 0; j < itemsList.length; j++) {
                itemsList[j].addEventListener('click', function() {
                    email.value = this.textContent;
                    auto.innerHTML = '';
                });
            }
        }
    });
};


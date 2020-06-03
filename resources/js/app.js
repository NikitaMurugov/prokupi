require('./bootstrap');

if (window.innerWidth <= 1200)  {
    document.querySelector('.menu-right-sm').style.display = "block";
    document.querySelector('.menu-right-block').style.display = "none";
    document.querySelector('.fa-times').style.display = "block";
    document.querySelector('.menu-right-block').classList.add('menu-right-list');
    document.querySelector('.menu-right-block').classList.remove('menu-right');
} else {
    document.querySelector('.menu-right-sm').style.display = "none";
    document.querySelector('.fa-times').style.display = "none";
    document.querySelector('.menu-right-block').style.display = "block";
    document.querySelector('.menu-right-block').classList.remove('menu-right-list');
    document.querySelector('.menu-right-block').classList.add('menu-right');
}

if (window.innerWidth <= 740)  {
    let searcher = document.querySelector('.form-search');
    document.querySelector('.menu-right-block').appendChild(searcher);
    console.log(document.querySelector('.search-input').classList.contains('search-input-right'));
    if (document.querySelector('.search-input').classList.contains('search-input-left')){
        document.querySelector('.search-input').classList.remove('search-input-left');
        document.querySelector('.search-input').classList.add('search-input-right');
    }
}  else {
    let searcher = document.querySelector('.form-search');
    document.querySelector('.menu-left ').appendChild(searcher);
    if (document.querySelector('.search-input').classList.contains('search-input-right')){
        document.querySelector('.search-input').classList.remove('search-input-right');
        document.querySelector('.search-input').classList.add('search-input-left');
    }
    document.querySelector('.menu-left ').appendChild(searcher);
}
// console.log('scscscscsc');
    // console.log(document.querySelector('.fa-search'));


    document.querySelector('.fa-search').addEventListener('click', function () {
        document.querySelector('.search-input-button').click();
    });

    document.querySelector('.fa-times').addEventListener('click', function () {
        console.log('cscs');
        if (document.querySelector('.menu-right-block').classList.contains('show')) {
            document.querySelector('.menu-right-block').style.display = "none";
            document.querySelector('.menu-right-block').classList.remove('show');
        } else {
            document.querySelector('.menu-right-block').style.display = "flex";
            document.querySelector('.menu-right-block').classList.add('show');
        }
    });

    document.querySelector('.fa-bars').addEventListener('click', function () {
        if (!document.querySelector('.menu-right-block').classList.contains('show')) {
            document.querySelector('.menu-right-block').style.display = "flex";
            document.querySelector('.menu-right-block').classList.add('show');
        } else {
            document.querySelector('.menu-right-block').style.display = "none";
            document.querySelector('.menu-right-block').classList.remove('show');
        }

    });

    window.addEventListener('resize', function() {
        if (window.innerWidth <= 1200)  {
            document.querySelector('.menu-right-sm').style.display = "block";
            document.querySelector('.menu-right-block').style.display = "none";
            document.querySelector('.fa-times').style.display = "block";
            document.querySelector('.menu-right-block').classList.add('menu-right-list');
            document.querySelector('.menu-right-block').classList.remove('menu-right');
        } else {
            document.querySelector('.menu-right-sm').style.display = "none";
            document.querySelector('.fa-times').style.display = "none";
            document.querySelector('.menu-right-block').style.display = "block";
            document.querySelector('.menu-right-block').classList.remove('menu-right-list');
            document.querySelector('.menu-right-block').classList.add('menu-right');
        }

        if (window.innerWidth <= 740)  {
            let searcher = document.querySelector('.form-search');
            document.querySelector('.menu-right-block').appendChild(searcher);
            console.log(document.querySelector('.search-input').classList.contains('search-input-right'));
            if (document.querySelector('.search-input').classList.contains('search-input-left')){
                document.querySelector('.search-input').classList.remove('search-input-left');
                document.querySelector('.search-input').classList.add('search-input-right');
            }
        }  else {
            let searcher = document.querySelector('.form-search');
            document.querySelector('.menu-left ').appendChild(searcher);
            if (document.querySelector('.search-input').classList.contains('search-input-right')){
                document.querySelector('.search-input').classList.remove('search-input-right');
                document.querySelector('.search-input').classList.add('search-input-left');
            }
            document.querySelector('.menu-left ').appendChild(searcher);
        }
    });




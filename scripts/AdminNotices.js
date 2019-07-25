var RSAdminNotices = (function () {


    function addSuccess(message, dissmissable) {
        addNotice('success', message, dissmissable);
    }

    function addWarning(message, dissmissable) {
        addNotice('warning', message, dissmissable);

    }

    function addError(message, dissmissable) {
        addNotice('error', message, dissmissable);

    }

    function addInfo(message, dissmissable) {
        addNotice('info', message, dissmissable);

    }


    function addNotice(type, message, dissmissable) {

        message = typeof message !== 'undefined' ? message : '';
        dissmissable = typeof dissmissable !== 'undefined' ? dissmissable : false;


        var type_css_class = '';

        switch (type) {
            case 'error':
                type_css_class = 'notice-error';
                break;
            case 'success':
                type_css_class = 'notice-success';
                break;
            case 'warning':
                type_css_class = 'notice-warning';
                break;
            case 'info':
            default:
                type_css_class = 'notice-info';
                break;
        }


        var div = document.createElement('div');
        div.classList.add('notice', type_css_class);

        if (dissmissable === true) {
            div.classList.add('is-dismissible');
        }

        /* create paragraph element to hold message */

        var p = document.createElement('p');

        /* Add message text */

        p.appendChild(document.createTextNode(message));

        // Optionally add a link here

        /* Add the whole message to notice div */

        div.appendChild(p);

        /* Create Dismiss icon */

        var b = document.createElement('button');
        b.setAttribute('type', 'button');
        b.classList.add('notice-dismiss');

        /* Add screen reader text to Dismiss icon */

        var bSpan = document.createElement('span');
        bSpan.classList.add('screen-reader-text');
        bSpan.appendChild(document.createTextNode('Dismiss this notice'));
        b.appendChild(bSpan);

        /* Add Dismiss icon to notice */

        div.appendChild(b);

        /* Insert notice after the first h1 */

        var h1 = document.getElementsByTagName('h1')[0];
        h1.parentNode.insertBefore(div, h1.nextSibling);


        /* Make the notice dismissable when the Dismiss icon is clicked */

        b.addEventListener('click', function () {
            div.parentNode.removeChild(div);
        });

    }

    return {
        addSuccess : addSuccess,
        addError : addError,
        addWarning : addWarning,
        addInfo : addInfo
    }
})();


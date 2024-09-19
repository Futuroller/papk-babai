function _createModal(options) {
    const modal = document.createElement('div');
    modal.classList.add('modal');
    modal.insertAdjacentHTML('afterbegin', `
        <div class="modal-overlay" data-close="true">
            <div class="modal-window">
                <div class="modal-header">
                    <span class="modal-title" data-title>${options.title || 'Имя Фамилия'}</span>
                    <span class="modal-close" data-close="true">&times;</span>
                </div>
                <div class="modal-body">
                    <img src='images/${options.img}.jpg'>
                    <div data-content></div>
                </div>
            </div>
        </div>
    `);
    document.body.prepend(modal);
    return modal;
}

$.modal = function(options) {
    const ANIMATION_SPEED = 200;
    const $modal = _createModal(options);
    let closing = false;
    let destroyed = false;
    
    const modal = {
        open() {
            if (destroyed == true) {
                return console.log('Modal is destroyed');
            }
            !closing && $modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        },
        close() {
            closing = true;
            $modal.classList.remove('open');
            $modal.classList.add('hide');
            setTimeout(() => {
                $modal.classList.remove('hide');
                closing = false;
                document.body.style.overflow = 'visible';
            }, ANIMATION_SPEED)
        }
    }

    const listener = event => {
        if (event.target.dataset.close) {
            modal.close();
        }
    }

    $modal.addEventListener('click', listener);

    return Object.assign(modal, {
        destroy() {
            $modal.parentNode.removeChild($modal);
            $modal.removeEventListener('click', listener);
            destroyed = true;
        },
        setContent(title, img, content) { 
            $modal.querySelector('[data-title]').innerHTML = title;
            $modal.querySelector('img').src = img;
            $modal.querySelector('[data-content]').innerHTML = content;
        }
    });
}
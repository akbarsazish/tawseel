function openGeneralModal(modalId, modalHeaderId) {
    const modal = document.getElementById(modalId);
    const modalHeader = document.getElementById(modalHeaderId);

    let isDragging = false;
    let offsetX = 0;
    let offsetY = 0;
    
    if (modal && modalHeader ) {
        // modal.style.display = "grid";
        $('#' + modalId).modal('show');
       
        modalHeader.addEventListener('mousedown', function (e) {
            isDragging = true;
            offsetX = e.clientX - modal.getBoundingClientRect().left;
            offsetY = e.clientY - modal.getBoundingClientRect().top;
        });
        document.addEventListener('mousemove', function (e) {
            if (isDragging) {
                modal.style.left = e.clientX - offsetX + 'px';
                modal.style.top = e.clientY - offsetY + 'px';
            }
        });
        document.addEventListener('mouseup', function () {
            isDragging = false;
        });
    } else {
        console.error(`Modal not found id of ${modalId}`);
    }
}


function closeGeneralModal(modalId) {
   $('#' + modalId).modal('hide');
}

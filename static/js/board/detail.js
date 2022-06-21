// (function () {
//     const Del = document.querySelector('#btnDel');
    
//     Del.addEventListener('click', e => {
//         if (confirm('삭제하시겠습니까?')) {
//             location.href = `del?i_board=${Del.dataset.i_board}`;
//         }
//     });
// }
// )();

(function () {
    const Del = document.querySelector('#btnDel');
    const Val = Del.value;
    
    Del.addEventListener('click', function () {
        if (confirm('삭제하시겠습니까?')) {
            location.href = `del?i_board=${Val}`;
        }
    });
}
)();
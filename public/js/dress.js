import store from './store.js';


$('#chooseDress').on('show.bs.modal', function (e) {
  //fetch unavailable dress by tgl peminjaman & tgl pengembalian
  store.getState().getUnavailableDress('2021-06-05', '2021-06-10').then((result)=> {
    const dressList = document.querySelectorAll('[data-dress-id]');
    dressList.forEach(el => {
        if(result.some((id) => el.dataset.dressId == id)) el.classList.add('unavailable','x-emoji-overlay');
    });
  })
})
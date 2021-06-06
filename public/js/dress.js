import store from './store.js';


$('#chooseDress').on('show.bs.modal', function (e) {
  //fetch unavailable dress by tgl peminjaman & tgl pengembalian
  const tglPeminjaman = formattedTanggal(document.getElementById('tgl_peminjaman'));
  const tglPengembalian = formattedTanggal(document.getElementById('tgl_pengembalian'));
  const dressWrapper = document.getElementById('listDress');

  if(tglPeminjaman || tglPengembalian){
    dressWrapper.classList.remove('disableChooseDress');
    store.getState().getUnavailableDress(tglPeminjaman, tglPengembalian).then((result)=> {
        const dressList = document.querySelectorAll('[data-dress-id]');
        dressList.forEach(el => {
            if(result.some((data) => el.dataset.dressId == data.id)){
                const findDress = result.find((data) => el.dataset.dressId === data.id);
                const peminjamanElement = createElementLabel(findDress.tgl_peminjaman,"Peminjaman");
                const pengembalianElement = createElementLabel(findDress.tgl_pengembalian, "Pengembalian");

                if(!el.querySelector('.dateLabel')){
                    el.querySelector('article').appendChild(peminjamanElement);
                    el.querySelector('article').appendChild(pengembalianElement);
                }

                el.classList.add('unavailable','x-emoji-overlay');
            }else{
                if(el.querySelectorAll('.dateLabel').length > 0) {
                    el.querySelectorAll('.dateLabel').forEach(cel => cel.remove());
                }
                el.classList.remove('unavailable','x-emoji-overlay');
            };
        });
      })
  }else{
    dressWrapper.classList.add('disableChooseDress');
    alert('Pilih tanggal peminjaman & tanggal pengembalian dahulu');
  }

})


//helper function
function formattedTanggal(tgl) {
    if(tgl.value === "") return false;
    const [month,day,year] = tgl.value.split('/');
    return `${year}-${month}-${day}`;
}

//helper function
function createElementLabel(dateContent,label) {
    var el = document.createElement('div');
    el.classList.add("dateLabel");
    el.innerText = `${label}: ${dateContent.slice(0,10)}`;
    return el;
}
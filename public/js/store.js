import create from 'https://cdn.skypack.dev/zustand/vanilla';
import { persist, devtools } from "https://cdn.skypack.dev/zustand/middleware"

const storeFn = (set) => ({
  dressIds: [],
  getUnavailableDress: async (tgl_peminjaman, tgl_pengembalian) => {
      const response = await fetch(`${window.URL_ROOT}/bookings/api/getUnavailableDress?tgl_peminjaman=${tgl_peminjaman}&tgl_pengembalian=${tgl_pengembalian}`);
      const result = await response.json();
      set({
          dressIds: result.data
      })
      return result.data;
  },
})

const storeWithDevTools = devtools(storeFn,"Dress Store");
const persistStore = persist(storeWithDevTools,{
    name:"dressing"
});


const store = create(persistStore);

export {store};
export default store;
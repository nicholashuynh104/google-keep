import axios from "axios"

export default ({
  namespaced: true,
  state: {
    note: [],
  },
  getters: {
    note:(state) => {
      return state.note;
    }
  },
  mutations: {
    setNotes(state,note) {
      state.note = note;
    }
  },
  actions: {
    async sendAddNotes (_,data) {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem("token"),
        }
      }
      const response = await axios.post('http://127.0.0.1:8000/api/addNotes',data,config);
      console.log(response)
    },

    async getNotes({commit}) {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem("token"),
        }
      }
      const response = await axios.get('http://127.0.0.1:8000/api/getNotes',config);
      commit('setNotes',response.data.notes)
    },

    async cloneNotes(_,id) {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem("token"),
        }
      }
      const response = await axios.patch(`http://127.0.0.1:8000/api/cloneNotes/${id}`,_,config);
      console.log(response);
    },

    async deleteNotes(_,id) {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem("token"),
        }
      }
      const response = await axios.patch(`http://127.0.0.1:8000/api/addBin/${id}`,_,config);
      console.log(response);
    }
  }
})
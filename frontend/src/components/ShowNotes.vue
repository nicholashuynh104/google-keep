<template >
  <div>
    <v-row v-if="note.length > 0">
      <v-col xl="4" md="6" sm="12" v-for="notes in note" :key="notes.id">
        <v-card class="p-3">
          <h3>{{ notes.title }}</h3>
          <p>{{ notes.notes }}</p>
          <div class="d-flex justify-content-between">
            <v-btn
              class="bg-primary text-white"
              data-toggle="tooltip"
              v-on:click="addAchieve(notes.id)"
              data-placement="top"
              title="Achive"
              >a</v-btn
            >
            <v-btn
              class="bg-success text-white"
              data-toggle="tooltip"
              data-placement="top"
              title="Edit"
              >e</v-btn
            >
            <v-btn
              class="bg-info text-white"
              v-on:click="makeClone(notes.id)"
              data-toggle="tooltip"
              data-placement="top"
              title="Clone"
              >Clone</v-btn
            >
            <v-btn
              class="bg-danger text-white"
              v-on:click="deleteNote(notes.id)"
              data-toggle="tooltip"
              data-placement="top"
              title="Delete"
              >Delete</v-btn
            >
          </div>
        </v-card>
      </v-col>
    </v-row>
    <span v-else>
      <h4>Recoed not found</h4>
    </span>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters("notes", ["note"]),
  },
  methods: {
    // gets notes
    ...mapActions("notes", ["getNotes"]),

    // clone note
    ...mapActions("notes", ['cloneNotes']),
    makeClone(note_id) {
      this.cloneNotes(note_id);
      this.getNotes();
    },

    // delete note
    ...mapActions("notes", ['deleteNotes']),
    deleteNote(note_id) {
      this.deleteNotes(note_id);
      this.getNotes();
    }
  },
  mounted() {
    this.getNotes();
  },
};
</script>
<style >
</style>
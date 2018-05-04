<template>
<div class="container">
  <div class="col-sm-6">
    <input v-model="postPanelName" type="text" name="name">
  </div>
  <button @click="postPanel" class="btn btn-default">
               Add Panel
            </button>

  <div class="row">
    <div class="col-sm" v-for="panel in panels" :key="panel.id">
      <div class="card">
        <nav class="card-header navbar">
          <span class="navbar-brand">{{panel.name}}</span>
          <delete-panel-modal :panelName="panel.name" :panelId="panel.id" @update-panels="updatePanels"/>
        </nav>
        <div class="card-body">
          sample
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import DeletePanelModal from './DeletePanelModal';

export default {
  components: {
    DeletePanelModal
  },
  created() {
    this.fetchPanels()
  },
  data() {
    return {
      postPanelName: '',
      panels: []
    }
  },
  methods: {
    fetchPanels() {
      this.$http.get('/api/panels')
        .then(res => {
          this.panels = res.data;
        })
    },
    postPanel() {
      var panel = {
        'name': this.postPanelName
      };
      this.$http.post('/api/panels', panel)
        .then(res => {
          this.panels = res.data;
        })
    },
    updatePanels: function(data) {
      this.panels = data;
    }
  }
}
</script>

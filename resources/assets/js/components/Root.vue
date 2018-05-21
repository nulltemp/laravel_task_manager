<template>
<div>
  <v-container grid-list-xl>
    <v-layout row wrap>
      <v-flex xs5>
        <v-text-field
          label="パネル名"
          v-model="postPanelName"
        ></v-text-field>
      </v-flex>
      <v-flex>
        <v-btn @click="postPanel">パネルの追加</v-btn>
      </v-flex>
    </v-layout>

    <v-layout row>
      <v-flex v-for="panel in panels" :key="panel.id">
        <v-card>
          <v-card-title>
            {{panel.name}}
            <v-spacer></v-spacer>
            <delete-panel-modal :panelName="panel.name" :panelId="panel.id" @update-panels="updatePanels"/>
          </v-card-title>
          <v-card-text>
            sample
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
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

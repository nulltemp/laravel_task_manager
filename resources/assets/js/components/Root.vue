<template>
<v-app>
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
            <create-task-modal :panelId="panel.id" @update-tasks="updateTasks"/>
            <delete-panel-modal :panelName="panel.name" :panelId="panel.id" @update-panels="updatePanels"/>
          </v-card-title>

          <v-layout row wrap justify-center>
            <v-flex xs11 v-for="task in tasks[panel.id]" :key="task.id">
              <v-card>
                <v-card-text>
                  {{task.name}}
                </v-card-text>
              </v-card>
            </v-flex>
          </v-layout>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</v-app>
</template>

<script>
import DeletePanelModal from './DeletePanelModal';
import CreateTaskModal from './CreateTaskModal';

export default {
  components: {
    DeletePanelModal,
    CreateTaskModal
  },
  created() {
    this.fetchPanels()
  },
  data() {
    return {
      postPanelName: '',
      panels: [],
      tasks: []
    }
  },
  methods: {
    fetchPanels() {
      this.$http.get('/api/panels')
        .then(res => {
          this.panels = res.data;
          this.panels.forEach(panel => {
            this.fetchTasks(panel.id)
          })
        })
    },
    fetchTasks(panelId) {
      this.$http.get('/api/panels/' + panelId + '/tasks')
        .then(res => {
          Vue.set(this.tasks, panelId, res.data);
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
    },
    updateTasks(task) {
      this.fetchTasks(task.panel_id)
    }
  }
}
</script>

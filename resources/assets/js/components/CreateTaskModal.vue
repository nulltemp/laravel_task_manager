<template>
<div>
  <v-btn @click="visible = true" icon slot="activator">
    <v-icon>add</v-icon>
  </v-btn>

  <v-dialog v-model="visible" max-width="500px" hide-overlay persistent>
    <v-card>
      <v-card-title primary-title>
        タスクの新規作成
      </v-card-title>
      <v-card-text>
        <v-text-field
          label="タスク名"
          v-model="taskName"
        ></v-text-field>
      </v-card-text>
      <v-card-actions>
        <v-btn @click="visible = false">キャンセル</v-btn>
        <v-btn @click="createTask">作成</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</div>
</template>

<script>
export default {
  methods: {
    createTask() {
      this.visible = false
      var task = {
        'name': this.taskName,
        'panelId': this.panelId
      };
      this.$http.post('/api/tasks/', task)
        .then(res => {
          this.$emit('update-tasks', res.data);
        })
    }
  },
  props: ["panelId"],
  data() {
    return {
      visible: false,
      taskName: ''
    }
  }
}
</script>

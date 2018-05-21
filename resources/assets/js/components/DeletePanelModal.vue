<template>
<div>
  <v-btn @click="visible = true" icon slot="activator">
    <v-icon>close</v-icon>
  </v-btn>

  <v-dialog v-model="visible" max-width="500px" hide-overlay persistent>
    <v-card>
      <v-card-title primary-title>
        {{panelName}}パネルを削除しますか？
      </v-card-title>
      <v-card-actions>
        <v-btn @click="visible = false">キャンセル</v-btn>
        <v-btn @click="deletePanel">削除</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</div>
</template>

<script>
export default {
  methods: {
    deletePanel() {
      this.visible = false
      this.$http.delete('/api/panels/' + this.panelId)
        .then(res => {
          this.$emit('update-panels', res.data);
        })
    }
  },
  props: ["panelName", "panelId"],
  data() {
    return {
      visible: false
    }
  }
}
</script>

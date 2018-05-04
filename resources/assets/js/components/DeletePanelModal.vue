<template>
<div>
  <button class="btn btn-light" data-toggle="modal" :data-target="'#deletePanelModal' + panelId" aria-hidden="true">
    <span aria-hidden="true">&times;</span>
  </button>
  <div :id="'deletePanelModal' + panelId" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">パネルの削除</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          {{panelName}}パネルを削除しますか？
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" @click="deletePanel">削除</button>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  methods: {
    deletePanel() {
      this.$http.delete('/api/panels/' + this.panelId)
        .then(res => {
          this.$emit('update-panels', res.data);
        })
    }
  },
  props: ["panelName", "panelId"]
}
</script>

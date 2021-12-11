<template>
  <div
    class="modal fade show"
    id="modal-default"
    style="padding-right: 16px; display: block"
    aria-modal="true"
    role="dialog"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ title }}</h4>
          <button type="button" class="close" @click.prevent="handleClose">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <slot name="body"></slot>
        </div>
        <div class="modal-footer">
          <slot name="footer"></slot>
          <button
            type="button"
            class="btn btn-default"
            @click.prevent="handleClose"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BaseModal",
  props: {
    title: {
      type: String,
      required: true,
    },
  },
  created() {
    document.addEventListener("keyup", this.onClose);
  },
  destroyed() {
    document.removeEventListener("keyup", this.onClose);
  },
  methods: {
    handleClose() {
      this.$emit("close");
    },
    onClose(event) {
      // Escape key
      if (event.keyCode === 27) {
        this.handleClose();
      }
    },
  },
};
</script>


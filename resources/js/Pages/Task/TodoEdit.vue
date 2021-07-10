<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <form
          @submit.prevent="
            form.patch(route('tdlists.update', list.id), {
              onSuccess: () => form.reset(),
            })
          "
        >
          <input
            class="form-control"
            type="text"
            placeholder="Task Name"
            v-model="form.list"/>

          <div v-if="form.errors.list">{{ form.errors.list }}</div>
          <br />
          <button
            class="btn btn-info text-white"
            type="submit"
            :disabled="form.processing"
          >Update Task
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    list: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        list: this.list.list,
      }),
    };
  },
};
</script>

<style>
</style>

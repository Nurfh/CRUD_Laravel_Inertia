<template>
  <div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th>Task</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(list, index) in lists" :key="index">
              <td>{{ list.list }}</td>
              <td>
                <button class="btn btn-warning" @click="editList(list)">
                  Edit
                </button>
                <button class="btn btn-danger" @click="deleteList(list)">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    lists: {
      type: Array,
      required: true,
    },
  },
  methods: {
    editList(list) {
      console.log("list", list);
      this.$inertia.get(route("tdlists.edit", list.id));
    },
    deleteList(list) {
      console.log("list", list);
      this.$inertia.delete(route("tdlists.destroy", list.id), {
        onSuccess: () => {
          console.log("success");
        },
      });
    },
  },
};
</script>

<style>
</style>

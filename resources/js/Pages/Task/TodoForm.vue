<template>
  <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form
                    @submit.prevent="form.post(route('tdlists.store'),{onSuccess:() => form.reset(),
                    })"
                    >
                        <input
                        class="form-control"
                        type="text"
                        placeholder="Task"
                        v-model="form.list"
                    />
                        <div v-if="form.errors.list">{{ form.errors.list }}</div>
                        <br />
                        <button
                            class="btn btn-primary"
                            type="submit"
                            :disabled="form.processing"><i class="fas fa-plus"></i> Add Task</button>
                    </form>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            //the word form can be change with input
            form: this.$inertia.form({
                list: null,
            }),
        };
    },
};
</script>

<style>

</style>

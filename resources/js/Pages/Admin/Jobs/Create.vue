<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, useForm, usePage } from '@inertiajs/vue3'

const { employmentTypes } = usePage().props
const form = useForm({
    title: "",
    role: "",
    company_name: "",
    employment_type: "",
    salary: "",
    apply_url: "",
    company_logo: "",
    description: "",
})

const submit = () => {
    form.post(route('admin.jobs.store'), {
        onSuccess: () => form.reset(),
    })
}
</script>

<template>
    <Head title="Create Job" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create a Job</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="submit">

                            <!-- {{ --Job Title-- }} -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="title">
                                    Job Title
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="title" name="title" type="text"
                                    placeholder="e.g. Senior Back-End Engineer (PHP & Laravel)" v-model="form.title">
                                <p v-if="form.errors.title" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.title }}
                                </p>
                            </div>

                            <!-- {{ --Job Role-- }} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="role">
                                    Job Role
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="role" type="text" name="role" placeholder="Senior Laravel Developer"
                                    v-model="form.role">
                                <p v-if="form.errors.role" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.role }}
                                </p>
                            </div>

                            <!-- {{ --Employment Type-- }} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="employment_type">
                                    Employment Type
                                </label>
                                <select
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                    id="employment_type" name="employment_type" v-model="form.employment_type">
                                    <option selected>Select a type of employment</option>
                                    <option v-for="employmentType in employmentTypes.data" :value="employmentType.value">
                                        {{ employmentType.label }}
                                    </option>
                                </select>
                                <p v-if="form.errors.employment_type" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.employment_type }}
                                </p>
                            </div>

                            <!-- {{ --Company Name-- }} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="company_name">
                                    Company Name
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="company_name" name="company_name" type="text"
                                    placeholder="Pennsylvania Paper and Supply Company" v-model="form.company_name">
                                <p v-if="form.errors.company_name" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.company_name }}
                                </p>
                            </div>

                            <!-- {{ --Apply URL-- }} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="apply_url">
                                    URL to Description/Application
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="apply_url" type="url" name="apply_url" placeholder="https://yourcompany.com/careers"
                                    v-model="form.apply_url">
                                <p v-if="form.errors.apply_url" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.apply_url }}
                                </p>
                            </div>

                            <!-- {{ --Description --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">
                                    Description
                                </label>
                                <textarea
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="description" name="description" rows="3" placeholder="e.g. Senior Laravel Developer"
                                    v-model="form.description"></textarea>
                                <p v-if="form.errors.description" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.description }}
                                </p>
                            </div>

                            <!-- {{ --Salary --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="salary">
                                    Salary
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="salary" name="salary" type="text"
                                    placeholder="e.g, $120,000 - $145,000 or maybe €80,000 - €102,000"
                                    v-model="form.salary">
                                <p v-if="form.errors.salary" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.salary }}
                                </p>
                            </div>

                            <!-- {{ --Company Logo-- }} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="company_logo">
                                    URL of the Company Logo
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="company_logo" name="company_logo" type="url"
                                    placeholder="https://yourwebsite.com/images/company-logo.png"
                                    v-model="form.company_logo">
                                <p v-if="form.errors.company_logo" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.company_logo }}
                                </p>
                            </div>



                            <!-- {{ --Create Job Button-- }} -->
                            <div class="mt-8">
                                <button
                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300"
                                    type="submit">
                                    Create Job
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

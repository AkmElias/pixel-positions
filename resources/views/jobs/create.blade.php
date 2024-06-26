<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs" enctype="multipart/form-data">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD"/>
        <x-forms.input label="Location" name="location" placeholder="Winter park, Sylhet"/>
        <x-forms.select label="Schedule" name="schedule">
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted"/>
        <x-forms.checkbox label="Feature (cost extra)" name="featured"/>

        <x-forms.divider />
        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="CEO, Leadership, Management"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>

</x-layout>
@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <flux:heading size="xl" class="text-primary-300 paragraph-18-semibold">{{ $title }}</flux:heading>
    <!--<flux:subheading class="text-[#3454A1]">{{ $description }}</flux:subheading>-->
</div>

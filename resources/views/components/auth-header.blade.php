@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <flux:heading size="xl" class="text-[#3454A1]">{{ $title }}</flux:heading>
    <!--<flux:subheading class="text-[#3454A1]">{{ $description }}</flux:subheading>-->
</div>

<x-layouts.index :title="$title">
  <x-button class="my-3 inline-block" href="{{ route('incomes.create') }}">Add Income</x-button>
  <x-table :tableData="$tableData" actionRoute="incomes" />
</x-layouts.index>
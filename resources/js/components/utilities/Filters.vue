<template>
    <div class="dropdown">
      <label class="filer-views" for="filer-views">Views:</label>
      <select name = "filer-views" class="form-select form-select-sm select-views" aria-label="Default select example">
        <option value="1">Today</option>
        <option value="2">This week</option>
        <option value="3">This mounth</option>
        <option value="4">All time</option>
      </select>
    </div>
</template>

<script>
export default {
    name: "Filters",
}
</script>

<style scoped>
	.dropdown{
		width: 20%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.filer-views {
		padding-right: 5px;
	}
	.select-views {
		background-color: #404040 !important;
		color: #ddd !important;
		background-image:none;
	}
	
</style>
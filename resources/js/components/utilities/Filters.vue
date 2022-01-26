<template>
    <div class="dropdown">
      <label class="filer-views" for="filer-views">Date:</label>
      <select @change="changeDateSelect" name="filer-views" class="form-select form-select-sm select-views" v-model="dateSelect" aria-label="Default select example">
        <option value="today">Today</option>
        <option value="week">This week</option>
        <option value="mounth">This mounth</option>
        <option value="alltime">All time</option>
      </select>
    </div>
</template>

<script>
export default {
    name: "Filters",
	props: {
		dateSelect: String,
		changeDateSelect: Function
	}
}
</script>

<style scoped>
	.dropdown{
		width: 140px;
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
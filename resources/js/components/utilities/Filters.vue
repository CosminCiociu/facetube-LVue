<template>
		<div class="container-fluid m-0 p-0 container-filters">
			<div class="dropdown">
				<select @change="changeDateSelect" name="filer-views" class="form-select form-select-sm select-views" v-model="dateSelect" aria-label="Default select example">
					<option value="today">Today</option>
					<option value="week">This week</option>
					<option value="mounth">This mounth</option>
					<option value="alltime">All time</option>
				</select>
			</div>
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
	.dropdown {
		width: 170px;
	}
	.container-filters {
		display: flex;
		align-items: center;
		justify-content: flex-end;
	}
	.filer-views {
		padding-right: 5px;
	}
	.select-views {
		border: 0;
		background-color: #404040 !important;
		background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAiRJREFUSEut1s9r02AYB/Dv09SOgTAYHjwJg/0BHQ72B+wyLx6EgJexsW4r7jBbZpd1bdP0F011s7hCRrXUMU9SQYSBXoUxEAoeBEHw4GWg7KBCBxrWvpLiZN2aNO9rc0ye5/tJ8r5v3hAcjmxh8zWAKaeaM9fexJWVG3a15BSS0TeYS6Rdlli7Z5vnCKXzD7ggNRoRg1K5+1xQMrYqBmnZAhekxRUxSE3nuaC0GhWDEqkcF5RJxsSgWDLLBeVScTEomkhzQfmMag8pcY0rjGddna2lyHriFUA3RQPc9DHCM1IUZahJ3jpAo26aeGsI+HDy+3ii/U5DkXW/h3AAYJA3qEf9T+ZpjRd1/fO/wQtF1mbB8LSfEAG3ihv6SyuzY5Ysh1fLIFrsC8agbxUL0dOsDkjTNN/Rj+MDAq7/J/b22+GXyVqt1uwKWScXl5Vrl3DyngHDgtihxMyxUql01DG9u4UFl8JT5MEeAIkTM1stz+RjY3P/fJ/tSl64c1clQooHYmChJ8bWo249tpAsy9LQlat7YC63csLzynbpttBWHgiEhyGZdQAjPZ7s44CXTRiG0RCCrKbZhSU/gd4BzGcT0qAmG69Wtz853YzjP8Np48xcMACiSrcgRkzerZRf9BpLV5AVMjMXrDAgcC7w4W61vNILufBlcGqQ5fDgwOX2Yvb/rdv/1fhuLUqzr5AVNj09PwKJ6gzM9MI3trNjfHWDWDV/ALI8ofhdixViAAAAAElFTkSuQmCC")  !important; /* Better placement regardless of input width */;
	}

	
</style>
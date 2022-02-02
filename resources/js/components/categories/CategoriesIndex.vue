<template>
      <div class="container-fluid" id="container-no-padding">
        <div class="row row-cols-2 row-cols-lg-3">
          <template v-if="categories.length">
                  <template v-for="category in categories" :key="category.id">
                      <div class="col-sm-6 col-md-4 col-lg-3">
                          <CategoryItem  :category="category"/>
                      </div>
                  </template>
          </template>
		</div>
	</div>
</template>

<script>

import useCategories from "../../composables/categories";
import { onMounted, watch } from "vue";
import CategoryItem from './CategoryItem';
import Pagination from '../utilities/Pagination'

export default {
    name:"CategoriesIndex",
    components: {
        CategoryItem,
        Pagination
    },
    setup() {
        const { categories, getCategories, infoPaginate } = useCategories()
        onMounted(getCategories)

        return {
            categories,
            infoPaginate,
            getCategories
        }
    },
}
</script>

<style>

</style>
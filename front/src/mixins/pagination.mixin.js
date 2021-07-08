export default {
  data: () => ({
    page: 1,
    maxElems: 5,
  }),
  methods: {
    changePage(page) {
      this.page = page;
    },
  },
  computed: {
    maxPage() {
      return Math.ceil(this.dataForPagination.length / this.maxElems);
    },
    paginatedData() {
      const s = (this.page - 1) * this.maxElems;
      const e = s + this.maxElems;

      return this.dataForPagination.slice(s, e);
    },
    paginationPages() {
      const pages = [];
      const maxPage = this.maxPage;

      for (let i = 0; i < maxPage; ++i) {
        pages.push(i + 1);
      }

      return pages;
    },
  },
};

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
      const maxPage = this.maxPage;
      const pages = [];

      for (let i = 0; i < maxPage; ++i) {
        const page = i + 1;

        if (Math.abs(this.page - page) <= 2) {
          pages.push(page);
        }
      }

      return pages;
    },
  },
};

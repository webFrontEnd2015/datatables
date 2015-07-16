# datatables（未完）
Datatable是jQuery一个强大的插件，详见https://www.datatables.net/

常用的配置选项：

根据数据源、性能要求可以配置各种配置项，下面列举几个常用的选项：

•aaData: js array数据源数组，格式可以是二维数组 [ [a,b,c],[d,e,f] ] 或json串数组（支持深度嵌套），后者需结合列定义的mData选项，指定目标数据；
•bDeferRender:延迟渲染模式，开始只生成当前页所需的DOM结构，可以极大提高加载速度（适用js array和ajax source数据源）；
•aaSorting:指定预设排序列，如需不需要预设排序可以指定为[]；
•bSortClasses： 排序操作时给对应列的单元格加上区分标记用的class，可以指定false以禁用，提高大数据量的排序操作；
•aLengthMenu,iDisplayLength,sPaginationType： 分页、页码相关配置项，较简单，可以参考官方API；
•oLanguage：语言包选项，可以分别指定各子语句翻译或赋值整个包对象（json串），也可以指定 sUrl 值通过ajax方式获取语言包文件（目前在我们的产品中，已全部改用直接赋值语言包对象，以避免一些请求被转向的异常情况）。
列定义选项：

•列定义（column）是Data Table配置中较重要也是较复杂的配置选项，主要涉及单元数据获取、排序、过滤等选项；
•列定义主要有2个参数：aoColumnDefs 和 aoColumns ，两者基本一致，区别在于aoColumnDefs可以指定作用的列，而aoColumns需要每列逐一配置，与table实际列数保持一致；
•mRender：与mData基本一样，但少了改变目标值的特性，主要用于区分处理TD值的显示、过滤、排序；
•bSearchable, bSortable：设置列可否过滤、排序；
•sClass：设置列样式class；
回调函数选项：

•fnDrawCallback：每次表格重画时回呼，包括翻页、排序、过滤都会触发此function，可以在此加入需要处理的操作；
•fnPreDrawCallback：每次表格重画前回呼，可以在触发翻页、排序等操作之前进行预处理。

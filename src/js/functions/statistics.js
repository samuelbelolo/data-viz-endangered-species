if (count) {
    const countArray = [];



    for (const key in count) {
        countArray.push({
            name: key,
            value: count[key]
        })
    };
    console.log(countArray);

    let totalCount = 0

    for (const _count of countArray) {
        totalCount += _count.value.count
    }



    const width = 400
    const height = 300

    const colors = d3
        .scaleOrdinal(d3.schemeDark2)

    const svg = d3
        .select('.donut-chart').append('svg')
        .attr('width', width)
        .attr('height', height)

    const data = d3.pie().sort(null).value(count => count.value.count)(countArray)

    const segments = d3
        .arc()
        .innerRadius(50)
        .outerRadius(100)

    const sections = svg.append('g').attr('transform', 'translate(100,100)')
        .selectAll('path').data(data)

    sections
        .enter()
        .append('path')
        .attr('d', segments)
        .attr('fill', d => colors(d.data.value.count))

    const legends = svg
        .append('g')
        .attr('transform', 'translate(250, 0)')
        .selectAll('.legends')
        .data(data)
    const legend = legends
        .enter()
        .append('g')
        .classed('legends', true)
        .attr('transform', (d, i) => {
            return `translate(0,${ (i + 1) * 30 })`
        })
    legend
        .append('rect')
        .attr('width', 20)
        .attr('height', 20)
        .attr('fill', d => colors(d.data.value.count))

    legend
        .append('text')
        .text(d => `${ Math.floor(d.data.value.count / totalCount * 10000) / 100 }% ${ d.data.name }`)
        .attr('fill', d => colors(d.data.value.count))
        .attr('x', 30)
        .attr('y', 15)
}


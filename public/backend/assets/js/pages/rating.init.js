! function (r) {
    r(function () {
        r("#default").raty({
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-warning"
        }), r("#score").raty({
            score: 3,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#score-callback").raty({
            score: function () {
                return r(this).attr("data-score")
            },
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-dark"
        }), r("#scoreName").raty({
            scoreName: "entity[score]",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-warning"
        }), r("#number").raty({
            number: 10,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#number-callback").raty({
            number: function () {
                return r(this).attr("data-number")
            },
            starOff: "far fa-star text-dark",
            starOn: "fas fa-star text-dark"
        }), r("#numberMax").raty({
            numberMax: 5,
            number: 100,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-purple"
        }), r("#readOnly").raty({
            readOnly: !0,
            score: 3,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-success"
        }), r("#readOnly-callback").raty({
            readOnly: function () {
                return !0
            },
            starOff: "far fa-star text-dark"
        }), r("#noRatedMsg").raty({
            readOnly: !0,
            noRatedMsg: "I'am readOnly and I haven't rated yet!",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#halfShow-true").raty({
            score: 3.26,
            starHalf: "fas fa-star-half-alt",
            starOff: "far fa-star",
            starOn: "fas fa-star"
        }), r("#halfShow-false").raty({
            halfShow: !1,
            score: 3.26,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#round").raty({
            round: {
                down: .26,
                full: .6,
                up: .76
            },
            score: 3.26,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-pink"
        }), r("#half").raty({
            half: !0,
            starHalf: "fas fa-star-half-alt",
            starOff: "far fa-star",
            starOn: "fas fa-star"
        }), r("#starHalf").raty({
            half: !0,
            starHalf: "fas fa-star-half text-danger",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#click").raty({
            click: function (a, t) {
                alert("ID: " + r(this).attr("id") + "\nscore: " + a + "\nevent: " + t.type)
            },
            starOff: "far fa-star",
            starOn: "fas fa-star"
        }), r("#hints").raty({
            hints: ["a", null, "", void 0, "*_*"],
            starOff: "far fa-star",
            starOn: "fas fa-star"
        }), r("#star-off-and-star-on").raty({
            starOff: "far fa-bell text-muted",
            starOn: "fas fa-bell text-primary"
        }), r("#cancel").raty({
            cancel: !0,
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#cancelHint").raty({
            cancel: !0,
            cancelHint: "My cancel hint!",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-success"
        }), r("#cancelPlace").raty({
            cancel: !0,
            cancelPlace: "right",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-purple"
        }), r("#cancel-off-and-cancel-on").raty({
            starOff: "far fa-star",
            starOn: "fas fa-star",
            cancel: !0,
            cancelOff: "far fa-minus-square",
            cancelOn: "fas fa-minus-square text-danger"
        }), r("#iconRange").raty({
            iconRange: [{
                range: 1,
                on: "fas fa-cloud",
                off: "far fa-circle"
            }, {
                range: 2,
                on: "fas fa-cloud-download-alt",
                off: "far fa-circle"
            }, {
                range: 3,
                on: "fas fa-cloud-upload-alt",
                off: "far fa-circle"
            }, {
                range: 4,
                on: "fas fa-circle",
                off: "far fa-circle"
            }, {
                range: 5,
                on: "fas fa-cogs",
                off: "far fa-circle"
            }]
        }), r("#size-md").raty({
            starOff: "far fa-fw fa-star",
            starOn: "fas fa-fw fa-star",
            starHalf: "fas fa-star-half-alt",
            cancel: !0,
            half: !0
        }), r("#size-lg").raty({
            starOff: "far fa-fw fa-star",
            starOn: "fas fa-fw fa-star",
            starHalf: "fas fa-star-half-alt",
            cancel: !0,
            half: !0
        }), r("#target-div").raty({
            cancel: !0,
            target: "#target-div-hint",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-custom"
        }), r("#targetType").raty({
            cancel: !0,
            target: "#targetType-hint",
            targetType: "score",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-warning"
        }), r("#targetFormat").raty({
            target: "#targetFormat-hint",
            targetFormat: "Rating: {score}",
            starOff: "far fa-star text-muted",
            starOn: "fas fa-star text-danger"
        }), r("#mouseover").raty({
            starOff: "far fa-star",
            starOn: "fas fa-star",
            mouseover: function (a, t) {
                alert("ID: " + r(this).attr("id") + "\nscore: " + a + "\nevent: " + t.type)
            }
        }), r("#mouseout").raty({
            width: 150,
            starOff: "far fa-star",
            starOn: "fas fa-star",
            mouseout: function (a, t) {
                alert("ID: " + r(this).attr("id") + "\nscore: " + a + "\nevent: " + t.type)
            }
        })
    })
}(jQuery);
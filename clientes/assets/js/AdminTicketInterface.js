$(document).ready(function(){

    $("#replymessage").focus(function () {
        var gotValidResponse = false;
        $.post("supporttickets.php", { action: "makingreply", id: ticketid, token: csrfToken },
        function(data){
            gotValidResponse = true;
            if (data.isReplying) {
                $("#replyingAdminMsg").html(data.replyingMsg);
                $("#replyingAdminMsg").removeClass('alert-warning').addClass('alert-info');
                if (!$("#replyingAdminMsg").is(":visible")) {
                    $("#replyingAdminMsg").hide().removeClass('hidden').slideDown();
                }
            } else {
                $("#replyingAdminMsg").slideUp();
            }
        }, "json")
        .always(function() {
            if (!gotValidResponse) {
                $("#replyingAdminMsg").html('Session Expired. Please <a href="javascript:location.reload()" class="alert-link">reload the page</a> before continuing.');
                $("#replyingAdminMsg").removeClass('alert-info').addClass('alert-warning');
                if (!$("#replyingAdminMsg").is(":visible")) {
                    $("#replyingAdminMsg").hide().removeClass('hidden').slideDown();
                }
            } else if ($("#replyingAdminMsg").hasClass('alert-warning')) {
                $("#replyingAdminMsg").slideUp();
            }
        });
        return false;
    });

    $("#frmAddTicketReply").submit(function (e, options) {
        options = options || {};

        $("#btnPostReply").attr("disabled", "disabled");
        $("#btnPostReply i").removeClass("fa-reply").addClass("fa-spinner fa-spin");

        if (options.skipValidation) {
            return true;
        }

        e.preventDefault();

        var gotValidResponse = false;
        var postReply = false;
        var responseMsg = '';
        var thisElement = jQuery(this);

        $.post("supporttickets.php", { action: "validatereply", id: ticketid, status: $("#ticketstatus").val(), token: csrfToken },
            function(data){
                gotValidResponse = true;
                if (data.valid) {
                    if (data.statusChanged) {
                        // status has changed, confirm to post
                        $('#statusChangeStatus').html(data.currentStatus);
                        $('#modalStatusChanged').modal('show');
                    } else {
                        postReply = true;
                    }
                } else {
                    // access denied
                    responseMsg = 'Access Denied. Please try again.';
                }
            }, "json")
            .always(function() {
                if (!gotValidResponse) {
                    responseMsg = 'Session Expired. Please <a href="javascript:location.reload()" class="alert-link">reload the page</a> before continuing.';
                }

                if (responseMsg) {
                    postReply = false;
                    $("#replyingAdminMsg").html(responseMsg);
                    $("#replyingAdminMsg").removeClass('alert-info').addClass('alert-warning');
                    if (!$("#replyingAdminMsg").is(":visible")) {
                        $("#replyingAdminMsg").hide().removeClass('hidden').slideDown();
                    }
                    $('html, body').animate({
                        scrollTop: $("#replyingAdminMsg").offset().top - 15
                    }, 400);
                }

                if (postReply) {
                    $("#replyingAdminMsg").slideUp();
                    thisElement.attr('data-no-clear', 'false');
                    $("#frmAddTicketReply").trigger('submit', { 'skipValidation': true });
                } else {
                    $("#btnPostReply").removeAttr("disabled");
                    $("#btnPostReply i").removeClass("fa-spinner fa-spin").addClass("fa-reply");
                }
            });
    });

    $("#frmAddTicketNote").submit(function () {
        $("#btnAddNote").attr("disabled", "disabled");
        $("#btnAddNote i").removeClass("fa-reply").addClass("fa-spinner fa-spin");
    });

    $("#StatusChanged-Yes").click(function () {
        $("#frmAddTicketReply").trigger('submit', { 'skipValidation': true });
    });

    var currentTags = '';
    if ($('#ticketTags').length) {
    $('#ticketTags').textext({
        plugins : 'tags prompt focus autocomplete ajax',
        prompt : 'Add one...',
        tagsItems: ticketTags,
        ajax : {
            url : 'supporttickets.php?action=gettags',
            data: 'token='+csrfToken,
            dataType : 'json',
            cacheResults : true
        }
    }).bind('setFormData', function(e, data, isEmpty) {
            var newTags = $(e.target).textext()[0].hiddenInput().val();
            if (newTags!=currentTags) {
                $.post("supporttickets.php", { action: "savetags", id: ticketid, tags: newTags, token: csrfToken });
                currentTags = newTags;
            }
        });
    }

    $(window).unload( function () {
        $.post("supporttickets.php", { action: "endreply", id: ticketid, token: csrfToken });
    });
    $("#insertpredef, #btnInsertPredefinedReply").click(function () {
        $("#prerepliescontainer, #ticketPredefinedReplies").fadeToggle();
        return false;
    });
    /**
     * The following is in place for custom admin themes to facilitate migration.
     * Deprecated - will be removed in a future version
     */
    $("#addfileupload").click(function () {
        $("#fileuploads").append("<input type=\"file\" name=\"attachments[]\" class=\"form-control top-margin-5\">");
        return false;
    });
    $('.add-file-upload').click(function () {
        var moreId = $(this).data('more-id');
        $('#' + moreId).append("<input type=\"file\" name=\"attachments[]\" class=\"form-control top-margin-5\">");
        return false;
    });
    $('#btnAttachFiles').click(function () {
        $('#ticketReplyAttachments').fadeToggle();
    });
    $('#btnNoteAttachFiles').click(function () {
        $('#ticketNoteAttachments').fadeToggle();
    });
    $('#btnAddBillingEntry').click(function (e) {
        e.preventDefault();
        $('#ticketReplyBillingEntry').fadeToggle();
    });
    $('#btnInsertKbArticle').click(function (e) {
        e.preventDefault();
        window.open('supportticketskbarticle.php','kbartwnd','width=500,height=400,scrollbars=yes');
    });
    $("#ticketstatus").change(function () {
        $.post("supporttickets.php", { action: "changestatus", id: ticketid, status: this.options[this.selectedIndex].text, token: csrfToken });
    });
    $("#predefq").keyup(function () {
        var intellisearchlength = $("#predefq").val().length;
        if (intellisearchlength>2) {
        $.post("supporttickets.php", { action: "loadpredefinedreplies", predefq: $("#predefq").val(), token: csrfToken },
            function(data){
                $("#prerepliescontent").html(data);
            });
        }
    });

    jQuery("#watch-ticket").click(function() {
        var ticketId = jQuery(this).data('ticket-id'),
            adminId = jQuery(this).data('admin-id'),
            adminFullName = jQuery(this).data('admin-full-name'),
            type = jQuery(this).attr('data-type');

        jQuery.post(
            'supporttickets.php', {
                action: 'watcher_update',
                admin_id: adminId,
                ticket_id: ticketId,
                type: type,
                token: csrfToken
            },
            function (data) {
                var self = jQuery("#watch-ticket");
                var adminElementId = 'ticket-watcher-' + adminId;
                var $ticketWatcher = jQuery('#' + adminElementId);

                if (data == 1 && type == 'watch') {
                    jQuery(self).attr('data-type', 'unwatch');
                    jQuery(self).addClass('btn-danger').removeClass('btn-info');
                    jQuery(self).html(unwatch_ticket);

                    // Hide the 'None' watcher.
                    jQuery('#ticket-watcher-0').hide();

                    if ($ticketWatcher.length > 0) {
                        $ticketWatcher.show();
                    } else {
                        jQuery('#ticketWatchers').append('<li id="' + adminElementId + '">' + adminFullName + '<li>');
                    }
                }
                if (data == 1 && type == 'unwatch') {
                    jQuery(self).attr('data-type', 'watch');
                    jQuery(self).addClass('btn-info').removeClass('btn-danger');
                    jQuery(self).html(watch_ticket);

                    $ticketWatcher.hide();

                    // Remove any empty list items.
                    jQuery('#ticketWatchers li:empty').remove();

                    // Display 'None' is nothing is visible under Ticket Watchers.
                    if (jQuery("#ticketWatchers").children(":visible").length === 0) {
                        jQuery('#ticket-watcher-0').removeClass('hidden')
                            .show();
                    }
                }
            }
        );
    });
});

function doDeleteReply(id) {
    if (confirm(langdelreplysure)) {
        window.location='supporttickets.php?action=viewticket&id='+ticketid+'&sub=del&idsd='+id+'&token='+csrfToken;
    }
}
function doDeleteTicket() {
    if (confirm(langdelticketsure)) {
        window.location='supporttickets.php?sub=deleteticket&id='+ticketid+'&token='+csrfToken;
    }
}
function doDeleteNote(id) {
    if (confirm(langdelnotesure)) {
        window.location='supporttickets.php?action=viewticket&id='+ticketid+'&sub=delnote&idsd='+id+'&token='+csrfToken;
    }
}
function loadTab(target,type,offset) {
    $.post("supporttickets.php", { action: "get" + type, id: ticketid, userid: userid, target: target, offset: offset, token: csrfToken },
    function (data) {
        if ($("#tab" + target + "box #tab_content").length > 0) {
            $("#tab" + target + "box #tab_content").html(data);
        } else {
            $("#tab" + target).html(data);
        }
    });
}
function expandRelServices() {
    $("#relatedservicesexpand").html('<img src="images/loading.gif" align="top" /> '+langloading);
    $.post("supporttickets.php", { action: "getallservices", id: ticketid, userid: userid, token: csrfToken },
    function(data){
        $("#relatedservicestbl").append(data);
        $("#relatedservicesexpand").fadeOut();
    });
}
function updateTicket(val) {
    $.post("supporttickets.php", { action: "viewticket", id: ticketid, updateticket: val, value: $("#"+val).val(), token: csrfToken });
}
function editTicket(id) {
    $(".editbtns"+id).toggle();
    $("#content"+id+" div.message").hide();
    $("#content"+id+" div.message").after('<textarea rows="15" style="width:99%" id="ticketedit'+id+'">'+langloading+'</textarea>');
    $.post("supporttickets.php", { action: "getmsg", ref: id, token: csrfToken },
        function(data){
            $("#ticketedit"+id).val(data);
        });
}
function editTicketCancel(id) {
    $("#ticketedit"+id).hide();
    $("#content"+id+" div.message").show();
    $(".editbtns"+id).toggle();
}
function editTicketSave(id) {
    $("#ticketedit"+id).hide();
    $("#content"+id+" div.message").show();
    $(".editbtns"+id).toggle();
    $.post("supporttickets.php", { action: "updatereply", ref: id, text: $("#ticketedit"+id).val(), token: csrfToken },
        function(data){
            $("#content"+id+" div.message").html(data);
        });
}
function quoteTicket(id,ids) {
    $(".tab").removeClass("tabselected");
    $("#tab0").addClass("tabselected");
    $(".tabbox").hide();
    $("#tab0box").show();
    $.post("supporttickets.php", { action: "getquotedtext", id: id, ids: ids, token: csrfToken },
    function(data){
        $("#replymessage").val(data+"\n\n"+$("#replymessage").val());
    });
    return false;
}
function selectpredefcat(catid) {
    $.post("supporttickets.php", { action: "loadpredefinedreplies", cat: catid, token: csrfToken },
    function(data){
        $("#prerepliescontent").html(data);
    });
}
function selectpredefreply(artid) {
    $.post("supporttickets.php", { action: "getpredefinedreply", id: artid, token: csrfToken },
    function(data){
        $("#replymessage").addToReply(data);
    });
    $("#prerepliescontainer, #ticketPredefinedReplies").fadeOut();
}

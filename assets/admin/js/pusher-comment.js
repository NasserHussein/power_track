var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

Pusher.logToConsole = true;

var pusher = new Pusher('0554307d0b0401be3be5', {
  cluster: 'eu'
});

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<a href="" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span></a>
    <a href="">
    <div class="media">
        <div class="media-left align-self-center"><i
            class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
        <div class="media-body">
            <h6 class="media-heading">` + data.frist_name + ` ` + data.last_name + `  - علق علي دورة - ` + data.course_name + `</h6>
            <p>` + data.comment + `</p>
            <small>
                <time class="media-meta text-muted"
                      datetime="2015-06-11T18:29:20+08:00"> now
                </time>
            </small>
        </div>
    </div>
</a>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});

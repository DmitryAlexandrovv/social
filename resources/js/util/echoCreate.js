import Echo from 'laravel-echo';

export default function ({token}) {
    console.log(token);
    return new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        auth: {
            headers: {
                Authorization: token
            }
        }
    });
}

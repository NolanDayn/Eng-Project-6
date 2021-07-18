# Download the helper library from https://www.twilio.com/docs/python/install
import os
from twilio.rest import Client


# Find your Account SID and Auth Token at twilio.com/console
# and set the environment variables. See http://twil.io/secure
account_sid = 'AC46648a764504d96ef5f6ff9d7c493117'
auth_token = 'e93bf8dd9e97aced2da820ba8ea48d65'
client = Client(account_sid, auth_token)

message = client.messages \
                .create(
                     body="Help! HELP! We're stuck in the ELAVATOR!!",
                     from_='+19035002648',
                     to='+16473909082'
                 )

print(message.sid)
print(message.body)

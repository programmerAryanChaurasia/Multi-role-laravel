<!DOCTYPE html>
<html>
<head>
    <title>Invitation to Join Sembark</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; padding: 20px; text-align: center; }
        .content { background: #f8f9fa; padding: 20px; }
        .button { background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; }
        .footer { text-align: center; padding: 20px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>You're Invited to Join {{ $invitation->company->name }}!</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            
            <p>You have been invited by <strong>{{ $invitation->inviter->name }}</strong> to join 
            <strong>{{ $invitation->company->name }}</strong> on Sembark as a <strong>{{ $invitation->role }}</strong>.</p>
            
            <p><strong>As the company founder, you'll have administrative access to:</strong></p>
            <ul>
                <li>Create and manage short URLs</li>
                <li>Invite team members</li>
                <li>View analytics for your company</li>
                <li>Manage user permissions</li>
            </ul>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $registrationUrl }}" class="button" style="color: blue;">
                    Accept Invitation & Create Account
                </a>
            </div>
            
            
            <p>If you didn't expect this invitation, you can safely ignore this email.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Sembark. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
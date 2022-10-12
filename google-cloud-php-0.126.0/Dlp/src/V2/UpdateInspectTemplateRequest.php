<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for UpdateInspectTemplate.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.UpdateInspectTemplateRequest</code>
 */
class UpdateInspectTemplateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Resource name of organization and inspectTemplate to be updated, for
     * example `organizations/433245324/inspectTemplates/432452342` or
     * projects/project-id/inspectTemplates/432452342.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';
    /**
     * New InspectTemplate value.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectTemplate inspect_template = 2;</code>
     */
    private $inspect_template = null;
    /**
     * Mask to control which fields get updated.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 3;</code>
     */
    private $update_mask = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. Resource name of organization and inspectTemplate to be updated, for
     *           example `organizations/433245324/inspectTemplates/432452342` or
     *           projects/project-id/inspectTemplates/432452342.
     *     @type \Google\Cloud\Dlp\V2\InspectTemplate $inspect_template
     *           New InspectTemplate value.
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           Mask to control which fields get updated.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Dlp::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Resource name of organization and inspectTemplate to be updated, for
     * example `organizations/433245324/inspectTemplates/432452342` or
     * projects/project-id/inspectTemplates/432452342.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. Resource name of organization and inspectTemplate to be updated, for
     * example `organizations/433245324/inspectTemplates/432452342` or
     * projects/project-id/inspectTemplates/432452342.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * New InspectTemplate value.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectTemplate inspect_template = 2;</code>
     * @return \Google\Cloud\Dlp\V2\InspectTemplate
     */
    public function getInspectTemplate()
    {
        return $this->inspect_template;
    }

    /**
     * New InspectTemplate value.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.InspectTemplate inspect_template = 2;</code>
     * @param \Google\Cloud\Dlp\V2\InspectTemplate $var
     * @return $this
     */
    public function setInspectTemplate($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\InspectTemplate::class);
        $this->inspect_template = $var;

        return $this;
    }

    /**
     * Mask to control which fields get updated.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 3;</code>
     * @return \Google\Protobuf\FieldMask
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    /**
     * Mask to control which fields get updated.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 3;</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

}

